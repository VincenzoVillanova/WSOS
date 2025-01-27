package com.esame.citta.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import com.esame.citta.model.Citta;
import com.esame.citta.repository.CittaRepository;

@Controller
public class CittaController {

    CittaRepository repoc;

    public CittaController(CittaRepository repoc) {
        this.repoc = repoc;
    }

    @GetMapping("/citta")
    public String getCitta(Model model) {
        model.addAttribute("citta", repoc.findAll());
        return "citta/list";
    }

    @PostMapping("/citta/update")
    public String update(Citta obj) {
        repoc.save(obj);
        return "redirect:/citta";
    }

    @PostMapping("/citta/modifica")
    public String edit(Model model, long id) {
        model.addAttribute("citta", repoc.getReferenceById(id));
        return "citta/edit";
    }

    @PostMapping("/citta/elimina")
    public String update(long id) {
        repoc.deleteById(id);
        return "redirect:/citta";
    }
}
