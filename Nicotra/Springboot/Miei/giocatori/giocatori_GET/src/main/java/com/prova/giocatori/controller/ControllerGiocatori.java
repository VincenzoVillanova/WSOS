package com.prova.giocatori.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import com.prova.giocatori.model.Giocatore;
import com.prova.giocatori.repository.GiocatoreRepository;

@Controller
@RequestMapping("/giocatori")
public class ControllerGiocatori {

    private final GiocatoreRepository repo;

    public ControllerGiocatori(GiocatoreRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/insert")
    public String studentForm(Model model) {
        model.addAttribute("giocatori", new Giocatore());
        return "insert"; // Invoke ThymeLeaf template
    }

    @GetMapping("/lista")
    public String getMethodName(Model model) {
        model.addAttribute("giocatori", repo.findAll());
        return "lista"; // Invoke ThymeLeaf template
    }

    @GetMapping("/modifica/{id}")
    public String getMethodName3(Model model, @PathVariable Long id) {
        model.addAttribute("giocatori", repo.getReferenceById(id));
        return "insert"; // Invoke ThymeLeaf template
    }

    @GetMapping("/delete/{id}")
    public String getMethodName4(Model model, @PathVariable Long id) {
        Giocatore gio = repo.getReferenceById(id);
        repo.delete(gio);
        model.addAttribute("giocatori", repo.findAll());
        return "lista"; // Invoke ThymeLeaf template
    }

    @PostMapping
    public String postMethodName(@ModelAttribute Giocatore giocatore, Model model) {
        Giocatore save = repo.save(giocatore);
        model.addAttribute("giocatori", save);
        model.addAttribute("giocatori", repo.findAll());
        return "lista"; // Invoke ThymeLeaf template
    }

}
