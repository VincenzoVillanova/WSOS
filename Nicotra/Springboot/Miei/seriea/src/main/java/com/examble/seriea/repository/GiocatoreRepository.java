package com.examble.seriea.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.examble.seriea.model.Giocatore;

public interface GiocatoreRepository extends JpaRepository<Giocatore, Long> {

}
