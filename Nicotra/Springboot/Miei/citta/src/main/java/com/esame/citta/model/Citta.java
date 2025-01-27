package com.esame.citta.model;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Citta {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long id;
    String nome;
    String stato;

    @OneToMany(mappedBy = "cittaId", cascade = CascadeType.REMOVE)
    List<Residenti> cittadini = new ArrayList<>();

    public Citta(long id, String nome, String stato, List<Residenti> cittadini) {
        this.id = id;
        this.nome = nome;
        this.stato = stato;
        this.cittadini = cittadini;
    }

    public Citta() {
    }

    public List<Residenti> getCittadini() {
        return cittadini;
    }

    public void setCittadini(List<Residenti> cittadini) {
        this.cittadini = cittadini;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getNome() {
        return nome;
    }

    public void setNome(String nome) {
        this.nome = nome;
    }

    public String getStato() {
        return stato;
    }

    public void setStato(String stato) {
        this.stato = stato;
    }

}
