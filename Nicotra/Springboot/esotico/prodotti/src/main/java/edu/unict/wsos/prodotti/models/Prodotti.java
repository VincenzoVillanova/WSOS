package edu.unict.wsos.prodotti.models;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Prodotti {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;

    private String nomeProdotto; // Nome prodotto
    private Double prezzoProdotto; // Prezzo prodotto

    // Getters e Setters
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNomeProdotto() {
        return nomeProdotto;
    }

    public void setNomeProdotto(String nomeProdotto) {
        this.nomeProdotto = nomeProdotto;
    }

    public Double getPrezzoProdotto() {
        return prezzoProdotto;
    }

    public void setPrezzoProdotto(Double prezzoProdotto) {
        this.prezzoProdotto = prezzoProdotto;
    }
}
