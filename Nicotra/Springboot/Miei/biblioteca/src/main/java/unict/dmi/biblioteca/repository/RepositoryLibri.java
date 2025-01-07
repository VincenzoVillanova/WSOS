package unict.dmi.biblioteca.repository;

import org.springframework.data.jpa.repository.JpaRepository;

import unict.dmi.biblioteca.model.Libro;

public interface RepositoryLibri extends JpaRepository<Libro, Long> {

}
