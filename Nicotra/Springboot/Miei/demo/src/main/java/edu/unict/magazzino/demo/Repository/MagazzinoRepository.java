package edu.unict.magazzino.demo.Repository;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.magazzino.demo.Model.Magazzino;

public interface MagazzinoRepository extends JpaRepository<Magazzino, Long> {

}
