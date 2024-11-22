package edu.unict.dmicup;

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

@WebServlet("/dmicup")
public class WebApp extends HttpServlet {
    private Connection connection;
    private static final String CONNESSIONE = "jdbc:mysql://localhost:3306/dmi_cup?user=root&password=Vincenzo2002!";

    void stampaErroreSQL(SQLException e) {
        System.out.println("Stato SQL: " + e.getSQLState());
        System.out.println("Errore SQL: " + e.getErrorCode());
        e.printStackTrace();
    }

    @Override
    public void init() {
        System.out.println("Servlet avviata: " + this.getServletName());
        try {
            connection = DriverManager.getConnection(CONNESSIONE);
        } catch (SQLException e) {
            stampaErroreSQL(e);
        }
    }

    @Override
    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        response.setContentType("text/html");
        try (PrintWriter out = response.getWriter()) {
            out.println("<html><head><title>DMI CUP</title></head><body>");
            out.println("<h1>Benvenuti nella DMI CUP</h1>");

            // Query per la classifica delle squadre
            String queryClassifica = "SELECT nome AS NomeSquadra, punti AS PuntiTotali FROM squadra ORDER BY punti DESC;";
            try (Statement stmt = connection.createStatement();
                    ResultSet resultClassifica = stmt.executeQuery(queryClassifica)) {
                out.println("<h4>Ecco la classifica aggiornata:</h4>");
                out.println("<h4>Nome - Punti </h4>");
                while (resultClassifica.next()) {
                    out.println(resultClassifica.getString("NomeSquadra") + " - "
                            + resultClassifica.getInt("PuntiTotali") + "<br>");
                }
            } catch (SQLException e) {
                stampaErroreSQL(e);
                out.println("<p>Errore nel recupero della classifica.</p>");
            }

            // Recupera il parametro "squadra" dall'URL
            String nomeSquadra = request.getParameter("squadra");
            if (nomeSquadra != null && !nomeSquadra.isEmpty()) {
                // Prima query per ottenere l'ID della squadra dal nome
                String querySquadraID = "SELECT ID FROM squadra WHERE nome = ?";
                try (PreparedStatement stmtSquadra = connection.prepareStatement(querySquadraID)) {
                    stmtSquadra.setString(1, nomeSquadra);
                    ResultSet resultSquadra = stmtSquadra.executeQuery();

                    if (resultSquadra.next()) {
                        int idSquadra = resultSquadra.getInt("ID");

                        // Seconda query per ottenere la rosa della squadra con l'ID trovato
                        String queryRosa = "SELECT nome, ruolo FROM giocatore WHERE ID_squadra = ?";
                        try (PreparedStatement stmtRosa = connection.prepareStatement(queryRosa)) {
                            stmtRosa.setInt(1, idSquadra);
                            ResultSet resultRosa = stmtRosa.executeQuery();

                            out.println("<h4>Rosa completa della squadra: " + nomeSquadra + "</h4>");
                            out.println("<h4>Giocatore - Ruolo</h4>");
                            while (resultRosa.next()) {
                                out.println(
                                        resultRosa.getString("nome") + " - " + resultRosa.getString("ruolo") + "<br>");
                            }
                        }
                    } else {
                        out.println("<p>Squadra non trovata: " + nomeSquadra + "</p>");
                    }
                } catch (SQLException e) {
                    stampaErroreSQL(e);
                    out.println("<p>Errore nel recupero della rosa della squadra.</p>");
                }
            }

            out.println("</body></html>");
        }
    }

    @Override
    public void destroy() {
        try {
            if (connection != null && !connection.isClosed()) {
                connection.close();
                System.out.println("Connessione al database chiusa.");
            }
        } catch (SQLException e) {
            stampaErroreSQL(e);
        }
    }
}
