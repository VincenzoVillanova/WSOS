package com.dmi.hogwartsos.Model;

import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class wizard {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    Long id;
    String nominativo;
    @ManyToOne
    @JoinColumn(name = "langhouse")
    langhouse langhouseId;

    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getNominativo() {
        return nominativo;
    }

    public void setNominativo(String nominativo) {
        this.nominativo = nominativo;
    }

    public langhouse getLanghouseId() {
        return langhouseId;
    }

    public void setLanghouseId(langhouse langhouseId) {
        this.langhouseId = langhouseId;
    }

    public wizard(Long id, String nominativo, langhouse langhouseId) {
        this.id = id;
        this.nominativo = nominativo;
        this.langhouseId = langhouseId;
    }

    public wizard() {
    }

}
