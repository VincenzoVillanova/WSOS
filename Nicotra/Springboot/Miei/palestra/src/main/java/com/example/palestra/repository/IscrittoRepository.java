package com.example.palestra.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.example.palestra.model.Iscritto;
import com.example.palestra.model.Palestra;

public interface IscrittoRepository extends JpaRepository<Iscritto, Long> {

    List<Iscritto> findByPalestraId(Palestra palestraId);
}
