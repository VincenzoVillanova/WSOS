package com.examble.seriea.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import com.examble.seriea.model.Giocatore;
import com.examble.seriea.repository.GiocatoreRepository;
import com.examble.seriea.repository.SquadraRepository;

@Controller
public class GiocatoreController {

    private GiocatoreRepository repos;
    private SquadraRepository reposq;

    public GiocatoreController(GiocatoreRepository repos, SquadraRepository reposq) {
        this.repos = repos;
        this.reposq = reposq;
    }

    @GetMapping("/giocatore")
    public String select(Model model) {
        model.addAttribute("giocatori", repos.findAll());
        model.addAttribute("squadre", reposq.findAll());
        return "/giocatore/list";
    }

    @PostMapping("/giocatore/update")
    public String postMethodName(Model model, Giocatore obj) {
        repos.save(obj);
        return "redirect:/giocatore";
    }

    @PostMapping("/giocatore/edit")
    public String edit(Model model, Long id) {
        model.addAttribute("giocatore", repos.getReferenceById(id));
        return "/giocatore/edit";
    }

    @PostMapping("/giocatore/delete")
    public String delete(Long id) {
        repos.deleteById(id);
        return "redirect:/giocatore";
    }

}
