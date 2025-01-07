package com.example.demo.repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;
import org.springframework.stereotype.Repository;

import com.example.demo.models.Esame;

@Repository
public interface EsameRepository extends JpaRepository<Esame, Long> {

    // Metodo per trovare esami con un voto specifico
    List<Esame> findByVoto(int voto);
}
