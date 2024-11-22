package unict.Squadra;

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

@WebServlet("/squadra")
public class WebApp extends HttpServlet {

    private Connection connection;
    private final String CONNECTION = "jdbc:mysql://localhost:3306/squadra_calcio?user=root&password=Vincenzo2002!";

    void stampaErroreSQL(SQLException e) {
        System.out.println("Stato SQL: " + e.getSQLState());
        System.out.println("Errore SQL: " + e.getErrorCode());
    }

    @Override
    public void init() {
        try {
            connection = DriverManager.getConnection(CONNECTION);
        } catch (SQLException e) {
            stampaErroreSQL(e);
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
                        <h1><center>Squadra</center></h1>
                """);

        String query = "SELECT * FROM giocatori";

        try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {
            while (result.next()) {
                out.println("<form action='squadra' method='post'>");
                out.println("<input type='hidden' value='" + result.getInt("id") + "' name='id'>");
                out.println("<u><b>Nome</u>: </b>" + result.getString("nominativo") + "<br>");
                out.println("<u><b>Numero</u>:</b>" + result.getInt("numero_maglia") + "<br>");
                out.println("<input type='submit' name='action' value='modifica'>");
                out.println("<input type='submit' name='action' value='elimina'> <br>");
                out.println("</form>");
            }
        } catch (SQLException e) {
            stampaErroreSQL(e);
        }

        out.println("<h2> Inserisci nuovo giocatore </h2>");
        out.println("<form action='squadra' method='post'>");
        out.println("<input type='text' placeholder='inserire nominativo' name='nome'>");
        out.println("<input type='number' placeholder='inserire numero maglia' name='numero'>");
        out.println("<input type='submit' name='action' value='invia'>");
        out.println("</form>");
    }

    @Override
    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();
        String scelta = request.getParameter("action");

        if (scelta.equals("invia")) {
            int numero = Integer.parseInt(request.getParameter("numero"));
            String nome = request.getParameter("nome");

            String query = "INSERT INTO giocatori (nominativo,numero_maglia) VALUES (?,?)";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setInt(2, numero);
                stmt.executeUpdate();
                out.println("Inserimento effettuato con successo! <a href='/squadra'>torna alla home!</a>");
            } catch (SQLException e) {

                stampaErroreSQL(e);
            }

        }

        if (scelta.equals("elimina")) {
            int id = Integer.parseInt(request.getParameter("id"));
            System.out.println("ID=" + id);
            String query = "DELETE FROM giocatori WHERE id=?;";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setInt(1, id);
                stmt.executeUpdate();
                out.println("Eliminazione effettuata con successo! <a href='/squadra'>torna alla home!</a>");
            } catch (SQLException e) {

                stampaErroreSQL(e);
            }

        }

        if (scelta.equals("modifica")) {
            int id = Integer.parseInt(request.getParameter("id"));
            System.out.println("ID=" + id);
            String query = "SELECT * FROM giocatori WHERE id=" + id + ";";
            out.println("<h2> Modifica un giocatore </h2>");

            try (Statement stmt = connection.createStatement(); ResultSet result = stmt.executeQuery(query)) {
                while (result.next()) {
                    out.println("<form action='squadra' method='post'>");
                    out.println("<input type='hidden' value='" + result.getInt("id") + "' name='id'>");
                    out.println("<input type='text' placeholder='inserire nominativo' name='nome' value='" + result.getString("nominativo") + "'>");
                    out.println("<input type='number' placeholder='inserire numero maglia' name='numero' value='" + result.getInt("numero_maglia") + "'>");
                    out.println("<input type='submit' name='action' value='upgrade'> <br>");
                    out.println("</form>");
                }
            } catch (SQLException e) {

                stampaErroreSQL(e);
            }
        }

        if (scelta.equals("upgrade")) {
            int numero = Integer.parseInt(request.getParameter("numero"));
            String nome = request.getParameter("nome");
            int id = Integer.parseInt(request.getParameter("id"));
            String query = "UPDATE giocatori SET nominativo=?,numero_maglia=? WHERE id=?";

            try (PreparedStatement stmt = connection.prepareStatement(query)) {
                stmt.setString(1, nome);
                stmt.setInt(2, numero);
                stmt.setInt(3, id);
                stmt.executeUpdate();
                out.println("Modifica effettuata con successo! <a href='/squadra'>torna alla home!</a>");
            } catch (SQLException e) {

                stampaErroreSQL(e);
            }

        }

    }
}
