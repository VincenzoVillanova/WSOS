package com.example.palestra.model;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Palestra {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    long id;
    String nome;
    String via;
    @OneToMany(mappedBy = "palestraId", cascade = CascadeType.REMOVE)
    List<Iscritto> iscritti = new ArrayList<>();

    public Palestra() {
    }

    public Palestra(long id, String nome, String via, List<Iscritto> iscritti) {
        this.id = id;
        this.nome = nome;
        this.via = via;
        this.iscritti = iscritti;
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

    public String getVia() {
        return via;
    }

    public void setVia(String via) {
        this.via = via;
    }

    public List<Iscritto> getIscritti() {
        return iscritti;
    }

    public void setIscritti(List<Iscritto> iscritti) {
        this.iscritti = iscritti;
    }

}
