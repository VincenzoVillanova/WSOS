package com.example.demo.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import com.example.demo.models.Esame;
import com.example.demo.repository.EsameRepository;

@Controller
public class EsameController {

    private final EsameRepository repo;

    public EsameController(EsameRepository repo) {
        this.repo = repo;
    }

    // Home
    @GetMapping("/")
    public String getAllExam(Model model) {
        model.addAttribute("esami", repo.findAll());
        return "index";
    }

    @PostMapping("/insert")
    public String insert(Esame es) {
        repo.save(es);
        return "redirect:/";
    }

    // Delete or Update
    @PostMapping("/form")
    public String form(String action, Long id, Model model) {

        if (action.equals("Modifica")) {
            Esame es = repo.findById(id).orElse(null); // Find record in databse
            model.addAttribute("esami", es); // Pass record to the form for update
            return "update";
        }
        if (action.equals("Rimuovi")) {
            repo.deleteById(id);
            return "redirect:/";
        }

        return "read";
    }

    // Update (same code of Insert)
    @PostMapping("/update")
    public String update(Esame es) {
        repo.save(es);
        return "redirect:/";
    }
}
