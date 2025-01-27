package com.esame.citta.model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Residenti {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long id;
    String nominativo;
    @ManyToOne
    @JoinColumn(name = "citta_id")
    Citta cittaId;

    public Residenti() {
    }

    public Residenti(long id, String nominativo, Citta cittaId) {
        this.id = id;
        this.nominativo = nominativo;
        this.cittaId = cittaId;
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

    public Citta getCittaId() {
        return cittaId;
    }

    public void setCittaId(Citta cittaId) {
        this.cittaId = cittaId;
    }
}
