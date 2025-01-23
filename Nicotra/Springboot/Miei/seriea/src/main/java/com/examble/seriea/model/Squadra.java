package com.examble.seriea.model;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class Squadra {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;

    private String nome;

    @OneToMany(mappedBy = "squadra", cascade = CascadeType.ALL)

    private List<Giocatore> squadra = new ArrayList<>();

    public Squadra() {
    }

    public Squadra(long id, String nome, List<Giocatore> squadra) {
        this.id = id;
        this.nome = nome;
        this.squadra = squadra;
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

    public List<Giocatore> getSquadra() {
        return squadra;
    }

    public void setSquadra(List<Giocatore> squadra) {
        this.squadra = squadra;
    }

}
