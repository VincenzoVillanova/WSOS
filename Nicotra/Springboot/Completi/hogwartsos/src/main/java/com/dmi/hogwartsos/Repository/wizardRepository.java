package com.dmi.hogwartsos.Repository;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import com.dmi.hogwartsos.Model.langhouse;
import com.dmi.hogwartsos.Model.wizard;

public interface wizardRepository extends JpaRepository<wizard, Long> {

    public List<wizard> findByLanghouseId(langhouse langhouseId);
}
