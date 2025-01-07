package unict.dmi.dolci.controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.PostMapping;
import org.springframework.web.bind.annotation.RequestMapping;

import unict.dmi.dolci.model.Dolci;
import unict.dmi.dolci.repository.DolciRepository;

@Controller
@RequestMapping("/")

public class DolciController {

    private final DolciRepository repo;

    public DolciController(DolciRepository repo) {
        this.repo = repo;
    }

    @GetMapping("/")
    public String getHome(Model model) {
        model.addAttribute("dolci", repo.findAll());
        return "index";
    }

    @PostMapping("/update")
    public String update(Dolci obj) {
        repo.save(obj);
        return "redirect:/";
    }

    @PostMapping("/modifica")
    public String getForm(Model model, long id) {
        model.addAttribute("dolce", repo.getReferenceById(id));
        return "modifica";
    }

    @PostMapping("/elimina")
    public String elimina(long id) {
        repo.deleteById(id);
        return "redirect:/";
    }

}
