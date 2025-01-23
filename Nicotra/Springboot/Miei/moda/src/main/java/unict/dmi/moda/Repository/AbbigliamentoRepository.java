package unict.dmi.moda.Repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import unict.dmi.moda.Model.Abbigliamento;
import unict.dmi.moda.Model.Brand;

public interface AbbigliamentoRepository extends JpaRepository<Abbigliamento, Long> {

    List<Abbigliamento> findByBrandId(Brand brandId);

    List<Abbigliamento> findByNome(String nome);
}
