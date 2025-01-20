package com.example.datafifa.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.datafifa.model.Giocatore;
import com.example.datafifa.repository.RepositoryGiocatore;
import com.example.datafifa.repository.RepositorySquadra;

@Controller
public class ControllerGiocatore {

    private final RepositoryGiocatore repo;
    private final RepositorySquadra repos;

    public ControllerGiocatore(RepositoryGiocatore repo, RepositorySquadra repos) {
        this.repo = repo;
        this.repos = repos;
    }

    @GetMapping("/giocatore")
    public String read(Model model) {
        model.addAttribute("giocatori", repo.findAll());
        return ("giocatore/list");
    }

    @GetMapping("/giocatore/new")
    public String create(Model model) {
        model.addAttribute("giocatore", new Giocatore());
        model.addAttribute("squadre", repos.findAll());
        return ("giocatore/edit");
    }

    @GetMapping("/giocatore/{id}/modifica")
    public String modifica(@PathVariable Long id, Model model) {
        model.addAttribute("giocatore", repo.getReferenceById(id));
        model.addAttribute("squadre", repos.findAll());
        return ("giocatore/edit");
    }

    @GetMapping("/giocatore/{id}/elimina")
    public String delete(@PathVariable Long id, Model model) {
        Giocatore giocatore = repo.getReferenceById(id);
        repo.delete(giocatore);
        return ("redirect:/giocatore");
    }

    @PostMapping("/giocatore")
    public String cr(@ModelAttribute Giocatore sq, Model model) {
        repo.save(sq);
        return ("redirect:/giocatore");
    }

    @PostMapping("/giocatore/search")
    public String cerca(@RequestParam String search, Model model) {
        model.addAttribute("giocatori", repo.findByNominativoContainingIgnoreCase(search));
        return ("giocatore/list");
    }
}
