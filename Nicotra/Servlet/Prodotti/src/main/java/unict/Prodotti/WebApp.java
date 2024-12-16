package unict.Prodotti;

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

@WebServlet("/prodotti")
public class WebApp extends HttpServlet {

    private Connection connection;
    private final String CONNESSIONE = "jdbc:mysql://localhost:3306/GestioneProdotti?user=root&password=Vincenzo2002!";

    @Override
    public void init() {
        try {
            connection = DriverManager.getConnection(CONNESSIONE);
        } catch (SQLException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();

        out.println("""
                    <html>
                        <body>
                            <h1><center> Gestione Prodotti</center></h1>
                    """);

        String query = "SELECT * FROM Prodotti";

        try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {

            while (result.next()) {
                out.println("<form action='/prodotti' method='post'>");
                out.println("<input type='hidden' name='id' value='" + result.getInt("id") + "' <br>");
                out.println("Nome : " + result.getString("nome_prodotto"));
                out.println("Prezzo : " + result.getInt("prezzo_prodotto") + " <br>");
                out.println("<input type='submit' name='action' value='modifica'>");
                out.println("<input type='submit' name='action' value='elimina'>");
                out.println("<br>");
                out.println("</form>");
            }
        } catch (SQLException e) {
            // TODO Auto-generated catch block
            e.printStackTrace();
        }

        out.println("<form action='/prodotti' method='post'>");
        out.println("Nome : <input type='text' name ='nome' placeholder='inserisci nome'> ");
        out.println("Prezzo : <input type='number' name ='prezzo' placeholder='inserisci prezzo'> ");
        out.println("<input type='submit' name='action' value='invia'>");
        out.println("<br>");
        out.println("</form>");

    }

    @Override
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();

        String scelta = request.getParameter("action");

        if (scelta.equals("invia")) {
            String query = "INSERT INTO Prodotti (nome_prodotto,prezzo_prodotto) values (?,?)";
            String nome = request.getParameter("nome");
            int prezzo = Integer.parseInt(request.getParameter("prezzo"));

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setInt(2, prezzo);

                stmt.executeUpdate();

                out.println("Inserimento effettuato correttamente ! <a href='/prodotti'> Torna alla home!</a>");
            } catch (SQLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }

        if (scelta.equals("modifica")) {

            int id = Integer.parseInt(request.getParameter("id"));

            String query = "SELECT * FROM Prodotti WHERE id=" + id;

            try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {

                while (result.next()) {
                    out.println("<form action='/prodotti' method='post'>");
                    out.println("<input type='hidden' name='id' value='" + result.getInt("id") + "' <br>");
                    out.println("Nome : <input type='text' name ='nome' placeholder='inserisci nome' value='" + result.getString("nome_prodotto") + "'>");
                    out.println("Prezzo : <input type='number' name ='prezzo' placeholder='inserisci prezzo' value='" + result.getString("prezzo_prodotto") + "'>");
                    out.println("<input type='submit' name='action' value='update'>");
                    out.println("<br>");
                    out.println("</form>");
                }
            } catch (SQLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }

        if (scelta.equals("update")) {
            int id = Integer.parseInt(request.getParameter("id"));

            String query = "UPDATE Prodotti SET nome_prodotto=?,prezzo_prodotto=? WHERE id=" + id;
            String nome = request.getParameter("nome");
            int prezzo = Integer.parseInt(request.getParameter("prezzo"));

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setInt(2, prezzo);

                stmt.executeUpdate();

                out.println("Modifica effettuata correttamente ! <a href='/prodotti'> Torna alla home!</a>");
            } catch (SQLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }

        if (scelta.equals("elimina")) {
            int id = Integer.parseInt(request.getParameter("id"));

            String query = "DELETE FROM Prodotti WHERE id=?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setInt(1, id);
                stmt.executeUpdate();

                out.println("Eliminazione effettuata correttamente ! <a href='/prodotti'> Torna alla home!</a>");
            } catch (SQLException e) {
                // TODO Auto-generated catch block
                e.printStackTrace();
            }
        }
    }
}
