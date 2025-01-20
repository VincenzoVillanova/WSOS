package com.example.datafifa.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.datafifa.model.Giocatore;

public interface RepositoryGiocatore extends JpaRepository<Giocatore, Long> {

    List<Giocatore> findByNominativoContainingIgnoreCase(String search);

}
