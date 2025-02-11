package com.dmi.hogwartsos.Model;

import java.util.ArrayList;
import java.util.List;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.OneToMany;

@Entity
public class langhouse {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private long id;
    private String name;
    @OneToMany(mappedBy = "langhouseId", cascade = CascadeType.REMOVE)
    private List<wizard> wizard = new ArrayList<>();

    public langhouse() {
    }

    public langhouse(long id, String name, List<com.dmi.hogwartsos.Model.wizard> wizard) {
        this.id = id;
        this.name = name;
        this.wizard = wizard;
    }

    public long getId() {
        return id;
    }

    public void setId(long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public List<wizard> getWizard() {
        return wizard;
    }

    public void setWizard(List<wizard> wizard) {
        this.wizard = wizard;
    }

}
