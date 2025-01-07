package com.auto.auto.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import com.auto.auto.model.Auto;

public interface AutoRepository extends JpaRepository<Auto, Long> {

}
