package com.example.datafifa.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import com.example.datafifa.model.Squadra;
import com.example.datafifa.repository.RepositorySquadra;

@Controller
public class ControllerSquadra {

    private RepositorySquadra repo;

    public ControllerSquadra(RepositorySquadra repo) {
        this.repo = repo;
    }

    @GetMapping("/squadra")
    public String read(Model model) {
        model.addAttribute("squadre", repo.findAll());
        return ("squadra/list");
    }

    @GetMapping("/squadra/new")
    public String create(Model model) {
        model.addAttribute("squadra", new Squadra());
        return ("squadra/edit");
    }

    @GetMapping("/squadra/{id}/modifica")
    public String modifica(@PathVariable Long id, Model model) {
        model.addAttribute("squadra", repo.getReferenceById(id));
        return ("squadra/edit");
    }

    @GetMapping("/squadra/{id}/elimina")
    public String delete(@PathVariable Long id, Model model) {
        Squadra squadra = repo.getReferenceById(id);
        repo.delete(squadra);
        return ("redirect:/squadra");
    }

    @PostMapping("/squadra")
    public String cr(@ModelAttribute Squadra sq, Model model) {
        repo.save(sq);
        return ("redirect:/squadra");
    }

}
