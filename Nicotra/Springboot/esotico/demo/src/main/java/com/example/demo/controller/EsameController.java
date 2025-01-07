package com.example.demo.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestParam;

import com.example.demo.models.Esame;
import com.example.demo.repository.EsameRepository;

@Controller
public class EsameController {

    private final EsameRepository esameRepository;

    public EsameController(EsameRepository esameRepository) {
        this.esameRepository = esameRepository;
    }

    // Visualizza tutti gli esami o solo quelli con un voto specificato
    @GetMapping("/")
    public String getAllEsami(@RequestParam(required = false) Integer voto, Model model) {
        if (voto != null) {
            // Se è passato un parametro voto, filtra gli esami con quel voto
            model.addAttribute("esami", esameRepository.findByVoto(voto));
        } else {
            // Altrimenti mostra tutti gli esami
            model.addAttribute("esami", esameRepository.findAll());
        }
        return "index";
    }

    // Inserisce un nuovo esame
    @PostMapping("/insert")
    public String insertEsame(Esame esame) {
        esameRepository.save(esame);
        return "redirect:/";
    }

    // Gestisce le azioni di modifica o eliminazione
    @PostMapping("/form")
    public String handleFormAction(String action, Long id, Model model) {
        if ("Modifica".equals(action)) {
            Esame esame = esameRepository.findById(id).orElse(null);
            model.addAttribute("esame", esame); // Passa il record al form per la modifica
            return "update";
        }

        if ("Rimuovi".equals(action)) {
            esameRepository.deleteById(id);
            return "redirect:/";
        }

        return "index"; // In caso di azione non valida
    }

    // Aggiorna un esame
    @PostMapping("/update")
    public String updateEsame(Esame esame) {
        esameRepository.save(esame);
        return "redirect:/";
    }
}
