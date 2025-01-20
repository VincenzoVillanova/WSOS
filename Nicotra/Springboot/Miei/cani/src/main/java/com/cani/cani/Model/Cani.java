package com.cani.cani.Model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Cani {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;
    private String nome;
    private String razza;
    private int anni;
    @ManyToOne
    @JoinColumn(name = "proprietario_id")
    private Proprietari proprietario;

    public Cani() {
    }

    public Cani(int anni, long id, String nome, String razza, Proprietari proprietario) {
        this.anni = anni;
        this.id = id;
        this.nome = nome;
        this.razza = razza;
        this.proprietario = proprietario;
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

    public String getRazza() {
        return razza;
    }

    public void setRazza(String razza) {
        this.razza = razza;
    }

    public int getAnni() {
        return anni;
    }

    public void setAnni(int anni) {
        this.anni = anni;
    }

    public Proprietari getProprietario() {
        return proprietario;
    }

    public void setProprietario(Proprietari proprietario) {
        this.proprietario = proprietario;
    }
}
