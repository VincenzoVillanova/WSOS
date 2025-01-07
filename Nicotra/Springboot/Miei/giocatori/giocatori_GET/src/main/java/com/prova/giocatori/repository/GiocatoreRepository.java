package com.prova.giocatori.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.prova.giocatori.model.Giocatore;

public interface GiocatoreRepository extends JpaRepository<Giocatore, Long> {

}
