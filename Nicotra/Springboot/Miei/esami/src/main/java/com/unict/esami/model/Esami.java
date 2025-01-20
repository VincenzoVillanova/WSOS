package com.unict.esami.model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;

@Entity
public class Esami {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;
    private String nome;
    private String professore;
    private int cfu;

    public Esami() {
    }

    public Esami(int cfu, String nome, String professore) {
        this.cfu = cfu;
        this.nome = nome;
        this.professore = professore;
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

    public String getProfessore() {
        return professore;
    }

    public void setProfessore(String professore) {
        this.professore = professore;
    }

    public int getCfu() {
        return cfu;
    }

    public void setCfu(int cfu) {
        this.cfu = cfu;
    }

}
