package unict.tornei;

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

@WebServlet("/tornei")
public class WebApp extends HttpServlet {

    private Connection connection;
    private final String CONNESSIONE = "jdbc:mysql://localhost:3306/exam?user=root&password=Vincenzo2002!";

    public void stampaErrori(SQLException e) {
        System.out.println("Stato SQL: " + e.getSQLState());
        System.out.println("Errore SQL: " + e.getErrorCode());
    }

    @Override
    public void init() {
        try {
            connection = DriverManager.getConnection(CONNESSIONE);
        } catch (SQLException e) {
            stampaErrori(e);
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
                        <h1><center>Tornei</center></h1>
                """);

        String query = "SELECT * FROM tournaments";

        try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {
            while (result.next()) {
                out.println("<form action='/tornei' method='post'>");
                out.println("<input type='hidden' value='" + result.getInt("id") + "' name='id'>");
                out.println("Nome : " + result.getString("name") + "<br>");
                out.println("Logo : <br> <img src='" + result.getString("logo") + "' alt='logo' height='150' width='150'> <br>");
                out.println("Vincitore : " + result.getString("champion") + "<br>");
                out.println("Anno : " + result.getInt("year") + "<br>");
                out.println("<input type='submit' name='action' value='modifica'>");
                out.println("<input type='submit' name='action' value='elimina'> <br>");
                out.println("</form>");
            }

        } catch (SQLException e) {
            stampaErrori(e);
        }

        out.println("<h2>Crea un nuovo torneo !</h2>");
        out.println("<form action='/tornei' method='post'>");
        out.println("Nome : <input type='text' name='nome' placeholder='inserisci nome torneo'> <br>");
        out.println("Logo : <input type='text' name='logo' placeholder='inserisci logo url torneo'> <br>");
        out.println("Vincitore : <input type='text' name='vincitore' placeholder='inserisci vincitore torneo'> <br>");
        out.println("Anno : <input type='number' name='anno' placeholder='inserisci anno torneo'> <br>");
        out.println("<input type='submit' name='action' value='aggiungi'>");
        out.println("</form>");
    }

    @Override
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();

        String scelta = request.getParameter("action");

        if (scelta.equals("aggiungi")) {
            String nome = request.getParameter("nome");
            String logo = request.getParameter("logo");
            String champion = request.getParameter("vincitore");
            int anno = Integer.parseInt(request.getParameter("anno"));

            String query = "INSERT INTO tournaments (name,logo,champion,year) VALUES (?,?,?,?)";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setString(2, logo);
                stmt.setString(3, champion);
                stmt.setInt(4, anno);

                stmt.executeUpdate();
                out.println("Inserimento andato a buon fine! <a href='/tornei'>Torna alla home!</a>");
            } catch (SQLException e) {
                stampaErrori(e);
            }
        }

        if (scelta.equals("elimina")) {
            int id = Integer.parseInt(request.getParameter("id"));

            String query = "DELETE FROM tournaments WHERE id=?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setInt(1, id);
                stmt.executeUpdate();
                out.println("Eliminazione andata a buon fine! <a href='/tornei'>Torna alla home!</a>");
            } catch (SQLException e) {
                stampaErrori(e);
            }
        }

        if (scelta.equals("modifica")) {
            int id = Integer.parseInt(request.getParameter("id"));

            String query = "SELECT * FROM tournaments WHERE id=" + id;

            try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {
                while (result.next()) {
                    out.println("<form action='/tornei' method='post'>");
                    out.println("<input type='hidden' value='" + result.getInt("id") + "' name='id'>");
                    out.println("Nome : <input type='text' name='nome' placeholder='inserisci nome torneo' value='" + result.getString("name") + "'> <br>");
                    out.println("Logo : <input type='text' name='logo' placeholder='inserisci logo url torneo' value='" + result.getString("logo") + "'> <br>");
                    out.println("Vincitore : <input type='text' name='vincitore' placeholder='inserisci vincitore torneo' value='" + result.getString("champion") + "'> <br>");
                    out.println("Anno : <input type='number' name='anno' placeholder='inserisci anno torneo' value='" + result.getInt("year") + "'> <br>");
                    out.println("<input type='submit' name='action' value='update'> <br>");
                    out.println("</form>");
                }

            } catch (SQLException e) {
                stampaErrori(e);
            }
        }

        if (scelta.equals("update")) {
            int id = Integer.parseInt(request.getParameter("id"));
            String nome = request.getParameter("nome");
            String logo = request.getParameter("logo");
            String champion = request.getParameter("vincitore");
            int anno = Integer.parseInt(request.getParameter("anno"));

            String query = "UPDATE tournaments SET name=?,logo=?,champion=?,year=? WHERE id=?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setString(2, logo);
                stmt.setString(3, champion);
                stmt.setInt(4, anno);
                stmt.setInt(5, id);
                stmt.executeUpdate();
                out.println("Update andata a buon fine! <a href='/tornei'>Torna alla home!</a>");
            } catch (SQLException e) {
                stampaErrori(e);
            }
        }
    }
}
