package edu.unict.unidb.model;

import jakarta.persistence.CascadeType;
import jakarta.persistence.Entity;
import jakarta.persistence.GeneratedValue;
import jakarta.persistence.GenerationType;
import jakarta.persistence.Id;
import jakarta.persistence.JoinColumn;
import jakarta.persistence.ManyToOne;

@Entity
public class Student {

    @Id
    @GeneratedValue(strategy = GenerationType.IDENTITY)
    private Long id;
    private String name;
    private String matricola;

    @ManyToOne(cascade = CascadeType.PERSIST) // Usa PERSIST per salvare solo il nuovo Exam
    @JoinColumn(name = "exam_id", nullable = false) // La colonna di join deve esistere
    private Exam examId;

    public Student() {
    }

    public Student(Long id, String name, String matricola, Exam examId) {
        this.id = id;
        this.name = name;
        this.matricola = matricola;
        this.examId = examId;
    }

    // Getters e Setters
    public Long getId() {
        return id;
    }

    public void setId(Long id) {
        this.id = id;
    }

    public String getName() {
        return name;
    }

    public void setName(String name) {
        this.name = name;
    }

    public String getMatricola() {
        return matricola;
    }

    public void setMatricola(String matricola) {
        this.matricola = matricola;
    }

    public Exam getExamId() {
        return examId;
    }

    public void setExamId(Exam examId) {
        this.examId = examId;
    }
}
