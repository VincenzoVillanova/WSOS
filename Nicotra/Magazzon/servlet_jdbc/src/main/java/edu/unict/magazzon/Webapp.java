package edu.unict.magazzon;

import java.io.IOException;
import java.io.PrintWriter;
import java.sql.Connection;
import java.sql.DriverManager;
import java.sql.ResultSet;
import java.sql.SQLException;
import java.sql.Statement;

//import jakarta.servlet.annotation.WebServlet;
import jakarta.servlet.http.HttpServlet;
import jakarta.servlet.http.HttpServletRequest;
import jakarta.servlet.http.HttpServletResponse;

//@WebServlet("/magazzon")
public class Webapp extends HttpServlet {

    Connection connection;
    final String CONNESSIONE = "jdbc:mysql://localhost:3306/magazzon?user=root&password=Vincenzo2002!";

    void stampaErroreSQL(SQLException e) {
        System.out.println("Stato SQL: " + e.getSQLState());
        System.out.println("Errore SQL: " + e.getErrorCode());
    }

    public void init() {
        System.out.println("Servlet avviata: " + this.getServletName());
        try {
            connection = DriverManager.getConnection(CONNESSIONE);
        } catch (SQLException e) {
            System.out.println("Stato SQL: " + e.getSQLState());
            System.out.println("Errore SQL: " + e.getErrorCode());
        }
    }

    public void doGet(HttpServletRequest request, HttpServletResponse response) throws IOException {
        PrintWriter out;
        ResultSet result;
        response.setContentType("text/html");
        out = response.getWriter();
        out.println("<html><head><title>Magazzon</title></head><body>");
        out.println("<h1>Benvenuti in Magazzon</h1>");
        out.println("</body></html>");

        String query = "SELECT * FROM products";

        try {
            Statement stmt = connection.createStatement();
            result = stmt.executeQuery(query);
            out.println("<h3>Prodotti</h3>");
            out.println("<h4>Nome - Quantità - Prezzo</h4>");
            while (result.next()) {
                out.println(result.getString("name"));
                out.println(result.getInt("quantity"));
                out.println(result.getInt("price") + "<br>");
            }
        } catch (SQLException e) {
            stampaErroreSQL(e);
        }
        out.println("<h1>Aggiungi un nuovo prodotto</h1>");
        out.println("<form action='/magazzon' method='post'>");
        out.println("<input type='text' name='name' placeholder='nome'>");
        out.println("<input type='text' name='quantity'placeholder='quantità'>");
        out.println("<input type='number' name='price' placeholder='prezzo'>");
        out.println("<input type='submit' value='invia'>");
        out.println("</form>");
        out.println("</body></html>");
    }

    public void doPost(HttpServletRequest request, HttpServletResponse response) throws IOException {
        String name = request.getParameter("name");
        Integer quantity = Integer.parseInt(request.getParameter("quantity"));
        Float price = Float.parseFloat(request.getParameter("price"));
        System.out.println("Nome: " + name + " Quantità: " + quantity + " Prezzo: " + price);

        PrintWriter out;
        response.setContentType("text/html");
        out = response.getWriter();
        String query = "INSERT INTO products (name, quantity, price) VALUES ('" + name + "', " + quantity + ", " + price
                + ")";
        try {
            Statement stmt = connection.createStatement();
            int rows = stmt.executeUpdate(query);
            out.write("Righe aggiunte con successo: " + rows);
        } catch (SQLException e) {
            stampaErroreSQL(e);
        }
        out.write("torna alla Home");
    }

}
