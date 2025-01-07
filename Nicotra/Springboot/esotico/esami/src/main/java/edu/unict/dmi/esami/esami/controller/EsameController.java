package edu.unict.dmi.esami.esami.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import edu.unict.dmi.esami.esami.data.EsamiRepository;
import edu.unict.dmi.esami.esami.models.Esame;

@Controller
public class EsameController {

    private final EsamiRepository repo;

    public EsameController(EsamiRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String index(Model model) {

        model.addAttribute("esami", repo.findAll());

        return "index";
    }

    @PostMapping("/insert")
    public String postMethodName(Esame es) {
        repo.save(es);
        return "redirect:/";
    }

    @PostMapping("/form")
    public String handleFormAction(String action, Integer id, Model model) {
        if ("Modifica".equals(action)) {
            Esame esame = repo.findById(id).orElse(null);
            model.addAttribute("esame", esame); // Passa il record al form per la modifica
            return "update";
        }

        if ("Elimina".equals(action)) {
            repo.deleteById(id);
            return "redirect:/";
        }

        return "index"; // In caso di azione non valida
    }

}
