package com.esame.citta.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.esame.citta.model.Citta;
import com.esame.citta.model.Residenti;

public interface ResidentiRepository extends JpaRepository<Residenti, Long> {

    List<Residenti> findByCittaId(Citta cittaId);
}
