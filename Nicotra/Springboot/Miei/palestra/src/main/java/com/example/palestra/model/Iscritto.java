package com.example.palestra.model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Iscritto {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long id;
    String nome;
    int eta;
    int peso;
    @ManyToOne
    @JoinColumn(name = "palestra_id")
    Palestra palestraId;

    public Iscritto() {
    }

    public Iscritto(long id, String nome, int eta, int peso, Palestra palestraId) {
        this.id = id;
        this.nome = nome;
        this.eta = eta;
        this.peso = peso;
        this.palestraId = palestraId;
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

    public int getEta() {
        return eta;
    }

    public void setEta(int eta) {
        this.eta = eta;
    }

    public int getPeso() {
        return peso;
    }

    public void setPeso(int peso) {
        this.peso = peso;
    }

    public Palestra getPalestraId() {
        return palestraId;
    }

    public void setPalestraId(Palestra palestraId) {
        this.palestraId = palestraId;
    }

}
