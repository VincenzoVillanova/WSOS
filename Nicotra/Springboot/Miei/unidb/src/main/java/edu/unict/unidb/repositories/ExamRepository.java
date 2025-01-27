package edu.unict.unidb.repositories;

import java.util.List;

import org.springframework.data.jpa.repository.JpaRepository;

import edu.unict.unidb.model.Exam;

public interface ExamRepository extends JpaRepository<Exam, Long> {

    List<Exam> findByCfuLessThan(int cfu);

    public static List<Exam> incrementa(List<Exam> obj) {
        obj.forEach(exam -> exam.setCfu(exam.getCfu() + 6));
        return obj;
    }
}
