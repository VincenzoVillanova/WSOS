package com.dmi.hogwartsos.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import com.dmi.hogwartsos.Model.wizard;
import com.dmi.hogwartsos.Repository.langhouseRepository;
import com.dmi.hogwartsos.Repository.wizardRepository;

@Controller
public class wizardController {

    private final wizardRepository repow;
    private final langhouseRepository repol;

    public wizardController(wizardRepository repow, langhouseRepository repol) {
        this.repow = repow;
        this.repol = repol;
    }

    @GetMapping("/wizard")
    public String home(Model model) {
        model.addAttribute("wizard", repow.findAll());
        return "wizard/list";
    }

    @GetMapping("/wizard/new")
    public String create(Model model) {
        model.addAttribute("wizard", new wizard());
        model.addAttribute("langhouse", repol.findAll());
        return ("wizard/edit");
    }

    @GetMapping("/wizard/{id}/edit")
    public String edit(@PathVariable Long id, Model model) {
        model.addAttribute("wizard", repow.getReferenceById(id));
        model.addAttribute("langhouse", repol.findAll());
        return "wizard/edit";
    }

    @GetMapping("/wizard/{id}/delete")
    public String delete(@PathVariable Long id) {
        wizard wizard = repow.getReferenceById(id);
        repow.delete(wizard);
        return "redirect:/wizard";
    }

    @PostMapping("/wizard")
    public String cr(@ModelAttribute wizard wizard, Model model) {
        repow.save(wizard);
        return ("redirect:/wizard");
    }

}
