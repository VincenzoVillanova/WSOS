package com.cani.cani.Repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.cani.cani.Model.Cani;

public interface RepositoryCani extends JpaRepository<Cani, Long> {

    List<Cani> findByProprietario_Id(Long id);

    List<Cani> findByNome(String nome);
    /*
    Object findByProprietario_id_IdContainingIgnoreCase(long search);
     */
}
