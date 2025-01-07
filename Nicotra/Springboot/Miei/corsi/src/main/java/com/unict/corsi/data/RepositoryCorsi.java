package com.unict.corsi.data;

import org.springframework.data.jpa.repository.JpaRepository;

import com.unict.corsi.model.Corso;

public interface RepositoryCorsi extends JpaRepository<Corso, Long> {
}
