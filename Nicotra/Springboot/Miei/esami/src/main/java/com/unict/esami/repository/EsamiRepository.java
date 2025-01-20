package com.unict.esami.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.unict.esami.model.Esami;

public interface EsamiRepository extends JpaRepository<Esami, Long> {

}
