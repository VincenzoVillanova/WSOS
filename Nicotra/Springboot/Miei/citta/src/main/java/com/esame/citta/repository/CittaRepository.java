package com.esame.citta.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.esame.citta.model.Citta;

public interface CittaRepository extends JpaRepository<Citta, Long> {

}
