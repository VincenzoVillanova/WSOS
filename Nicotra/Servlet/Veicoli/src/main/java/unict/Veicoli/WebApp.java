package unict.Veicoli;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.PreparedStatement;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

@WebServlet("/veicoli")
public class WebApp extends HttpServlet {

    private Connection connection;
    final String CONNESSIONE = "jdbc:mysql://localhost:3306/VehicleDB?user=root&password=Vincenzo2002!";

    public void init() {
        try {
            connection = DriverManager.getConnection(CONNESSIONE);
        } catch (Exception e) {
            e.printStackTrace();
        }
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("""
                <html>
                    <head><title>Esame</title></head>
                    <body>
                        <h1><center>Database Veicoli</h1></center>
                """);

        String query = "SELECT * FROM Auto";

        try (Statement stmt = connection.createStatement()) {

            ResultSet result = stmt.executeQuery(query);
            out.println("<h2>Elenco di veicoli :</h2> <br>");
            while (result.next()) {
                out.println("<form action ='/veicoli' method ='post'>");
                out.println("<input type='submit' name='action' value='modifica'>");
                out.println("<input type='submit' name='action' value='elimina'>");
                out.println("<input type='hidden' name='id' value=" + result.getInt("ID_AUTO") + ">");
                out.println("<b> Marca : </b>" + result.getString("Marca") + " ");
                out.println("<b> Modello : </b>" + result.getString("Modello") + " ");
                out.println("<b> Anno : </b>" + result.getInt("Anno") + " ");
                out.println("<b>Cilindrata : </b>" + result.getInt("Cilindrata") + " ");
                out.println("<b>Alimentazione : </b>" + result.getString("Alimentazione") + " ");
                out.println("<b>Prezzo : </b>" + result.getInt("Prezzo") + "<br>");
                out.println("</form>");
            }

        } catch (SQLException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

        out.println("<h2> Inserisci un nuovo veicolo: </h2> <br>");
        out.println("<form action ='/veicoli' method ='post'>");
        out.println("<b> Marca : </b><input type='text' name='Marca'><br>");
        out.println("<b> Modello : </b><input type='text' name='Modello'><br> ");
        out.println("<b> Anno : </b> <input type='number' name='Anno'> <br> ");
        out.println("<b>Cilindrata : </b><input type='number' name='Cilindrata'><br> ");
        out.println("<b>Alimentazione : </b> <input type='text' name='Alimentazione'> Valori consentiti ('Benzina','Diesel','Elettrico','Ibrido','GPL','Metano') <br>");
        out.println("<b>Prezzo : </b> <input type='number' name='Prezzo'><br>");
        out.println("<input type='submit' name='action' value='invia'>");
        out.println("</form>");

    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        PrintWriter out = response.getWriter();

        out.println("""
                <html>
                    <head><title>Esame</title></head>
                    <body>
                """);

        String scelta = request.getParameter("action");

        if (scelta.equals("invia")) {
            String query = "INSERT INTO Auto (Marca,Modello,Anno,Cilindrata,Alimentazione,Prezzo) values (?,?,?,?,?,?)";
            String Modello = request.getParameter("Modello");
            int Anno = Integer.parseInt(request.getParameter("Anno"));
            int Cilindrata = Integer.parseInt(request.getParameter("Cilindrata"));
            String Alimentazione = request.getParameter("Alimentazione");
            int Prezzo = Integer.parseInt(request.getParameter("Prezzo"));
            String Marca = request.getParameter("Marca");

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, Marca);
                stmt.setString(2, Modello);
                stmt.setInt(3, Anno);
                stmt.setInt(4, Cilindrata);
                stmt.setString(5, Alimentazione);
                stmt.setInt(6, Prezzo);

                int rows = stmt.executeUpdate();

                out.println("Inserimento andato bene ! righe modificate : " + rows);
                out.println("<br> <a href='/veicoli'> Torna alla home! </a>");
            } catch (Exception e) {
                e.printStackTrace();
            }

        }

        if (scelta.equals("modifica")) {
            int id = Integer.parseInt(request.getParameter("id"));
            String query = "SELECT * FROM Auto WHERE ID_Auto=" + id;

            try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {

                while (result.next()) {
                    out.println("<h2> Inserisci un nuovo veicolo: </h2> <br>");
                    out.println("<form action ='/veicoli' method ='post'>");
                    out.println("<input type='hidden' name='id' value=" + result.getInt("ID_AUTO") + ">");
                    out.println("<b> Marca : </b><input type='text' value ='" + result.getString("Marca") + "' name='Marca'><br>");
                    out.println("<b> Modello : </b><input type='text' value='" + result.getString("Modello") + "' name='Modello'><br> ");
                    out.println("<b> Anno : </b> <input type='number' value='" + result.getInt("Anno") + "'' name='Anno'> <br> ");
                    out.println("<b>Cilindrata : </b><input type='number' value='" + result.getInt("Cilindrata") + "' name='Cilindrata'><br> ");
                    out.println("<b>Alimentazione : </b> <input type='text' value='" + result.getString("Alimentazione") + "' name='Alimentazione'> Valori consentiti ('Benzina','Diesel','Elettrico','Ibrido','GPL','Metano') <br>");
                    out.println("<b>Prezzo : </b> <input type='number' value='" + result.getInt("Prezzo") + "' name='Prezzo'><br>");
                    out.println("<input type='submit' name='action' value='update'>");
                    out.println("</form>");
                }
            } catch (Exception e) {
                e.printStackTrace();
            }

        }

        if (scelta.equals("update")) {
            int id = Integer.parseInt(request.getParameter("id"));
            String Modello = request.getParameter("Modello");
            int Anno = Integer.parseInt(request.getParameter("Anno"));
            int Cilindrata = Integer.parseInt(request.getParameter("Cilindrata"));
            String Alimentazione = request.getParameter("Alimentazione");
            int Prezzo = Integer.parseInt(request.getParameter("Prezzo"));
            String Marca = request.getParameter("Marca");

            String query = "UPDATE Auto SET Marca=?,Modello=?,Anno=?,Cilindrata=?,Alimentazione=?,Prezzo=? WHERE ID_Auto=?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, Marca);
                stmt.setString(2, Modello);
                stmt.setInt(3, Anno);
                stmt.setInt(4, Cilindrata);
                stmt.setString(5, Alimentazione);
                stmt.setInt(6, Prezzo);
                stmt.setInt(7, id);
                int rows = stmt.executeUpdate();

                out.println("Aggiornamento andato bene ! righe modificate : " + rows);

                out.println("<br><a href='/veicoli'> Torna alla home! </a>");
            } catch (SQLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();

            }

        }

        if (scelta.equals("elimina")) {
            int id = Integer.parseInt(request.getParameter("id"));

            String query = "DELETE FROM Auto WHERE ID_Auto=" + id;

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                int rows = stmt.executeUpdate();

                out.println("Eliminazione andata bene ! righe modificate : " + rows);

                out.println("<br><a href='/veicoli'> Torna alla home! </a>");

            } catch (SQLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }
    }
}
