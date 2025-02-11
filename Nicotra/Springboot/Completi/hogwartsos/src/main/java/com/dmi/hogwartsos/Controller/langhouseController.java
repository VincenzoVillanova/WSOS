package com.dmi.hogwartsos.Controller;

import org.springframework.stereotype.Controller;
import org.springframework.ui.Model;
import org.springframework.web.bind.annotation.GetMapping;
import org.springframework.web.bind.annotation.ModelAttribute;
import org.springframework.web.bind.annotation.PathVariable;
import org.springframework.web.bind.annotation.PostMapping;

import com.dmi.hogwartsos.Model.langhouse;
import com.dmi.hogwartsos.Repository.langhouseRepository;
import com.dmi.hogwartsos.Repository.wizardRepository;

@Controller
public class langhouseController {

    private final langhouseRepository repol;
    private final wizardRepository repow;

    public langhouseController(langhouseRepository repol, wizardRepository repow) {
        this.repol = repol;
        this.repow = repow;
    }

    @GetMapping("/langhouse")
    public String getHome(Model model) {
        model.addAttribute("langhouse", repol.findAll());
        return "langhouse/list";
    }

    @GetMapping("/langhouse/new")
    public String create(Model model) {
        model.addAttribute("langhouse", new langhouse());
        return ("langhouse/edit");
    }

    @GetMapping("/langhouse/{id}/edit")
    public String edit(@PathVariable Long id, Model model) {
        model.addAttribute("langhouse", repol.getReferenceById(id));
        return "langhouse/edit";
    }

    @GetMapping("/langhouse/{id}/delete")
    public String delete(@PathVariable Long id) {
        langhouse langhouse = repol.getReferenceById(id);
        repol.delete(langhouse);
        return "redirect:/langhouse";
    }

    @GetMapping("/langhouse/{id}/filter")
    public String filter(@PathVariable Long id, Model model) {
        langhouse langhouse = repol.getReferenceById(id);
        model.addAttribute("wizard", repow.findByLanghouseId(langhouse));
        return "wizard/list";
    }

    @PostMapping("/langhouse")
    public String cr(@ModelAttribute langhouse house, Model model) {
        repol.save(house);
        return ("redirect:/langhouse");
    }

}
