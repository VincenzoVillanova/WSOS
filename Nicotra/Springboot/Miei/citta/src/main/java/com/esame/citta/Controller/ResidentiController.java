package com.esame.citta.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;

import com.esame.citta.model.Citta;
import com.esame.citta.model.Residenti;
import com.esame.citta.repository.CittaRepository;
import com.esame.citta.repository.ResidentiRepository;

@Controller
public class ResidentiController {

    ResidentiRepository repor;
    CittaRepository repoc;

    public ResidentiController(ResidentiRepository repor, CittaRepository repoc) {
        this.repor = repor;
        this.repoc = repoc;
    }

    @GetMapping("/residenti")
    public String getresidenti(Model model) {
        model.addAttribute("residenti", repor.findAll());
        model.addAttribute("citta", repoc.findAll());
        return "residenti/list";
    }

    @PostMapping("/residenti/update")
    public String update(Residenti obj) {
        repor.save(obj);
        return "redirect:/residenti";
    }

    @PostMapping("/residenti/ricerca")
    public String ricerca(long id, Model model) {
        Citta obj=repoc.getReferenceById(id);
        model.addAttribute("residenti", repor.findByCittaId(obj));
        model.addAttribute("citta", repoc.findAll());
        return "residenti/list";
    }

    @PostMapping("/residenti/modifica")
    public String edit(Model model, long id) {
        model.addAttribute("residenti", repor.getReferenceById(id));
        model.addAttribute("citta", repoc.findAll());
        return "residenti/edit";
    }

    @PostMapping("/residenti/elimina")
    public String update(long id) {
        repor.deleteById(id);
        return "redirect:/residenti";
    }
}
