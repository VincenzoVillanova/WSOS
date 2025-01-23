package com.example.datafifa.model;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Giocatore {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;
    private String nominativo;
    private int numero;
    @ManyToOne(cascade = CascadeType.REMOVE)
    @JoinColumn(name = "squadra_id")
    private Squadra squadra_id;

    public Giocatore() {
    }

    public Giocatore(long id, String nominativo, int numero, Squadra squadra_id) {
        this.id = id;
        this.nominativo = nominativo;
        this.numero = numero;
        this.squadra_id = squadra_id;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getNominativo() {
        return nominativo;
    }

    public void setNominativo(String nominativo) {
        this.nominativo = nominativo;
    }

    public int getNumero() {
        return numero;
    }

    public void setNumero(int numero) {
        this.numero = numero;
    }

    public Squadra getSquadra_id() {
        return squadra_id;
    }

    public void setSquadra_id(Squadra squadra_id) {
        this.squadra_id = squadra_id;
    }
}
