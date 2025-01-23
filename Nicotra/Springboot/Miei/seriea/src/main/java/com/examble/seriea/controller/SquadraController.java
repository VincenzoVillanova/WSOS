package com.examble.seriea.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import com.examble.seriea.model.Squadra;
import com.examble.seriea.repository.SquadraRepository;

@Controller
public class SquadraController {

    private SquadraRepository repos;

    public SquadraController(SquadraRepository repos) {
        this.repos = repos;
    }

    @GetMapping("/")
    public String getHome(Model model) {
        return "index";
    }

    @GetMapping("/squadra")
    public String select(Model model) {
        model.addAttribute("squadre", repos.findAll());
        return "/squadra/list";
    }

    @PostMapping("/squadra/update")
    public String postMethodName(Model model, Squadra obj) {
        repos.save(obj);
        return "redirect:/squadra";
    }

    @PostMapping("/squadra/edit")
    public String edit(Model model, Long id) {
        model.addAttribute("squadra", repos.getReferenceById(id));
        return "/squadra/edit";
    }

    @PostMapping("/squadra/delete")
    public String delete(Long id) {
        repos.deleteById(id);
        return "redirect:/squadra";
    }

}
