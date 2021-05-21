using Microsoft.AspNetCore.Mvc;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SCW.Controllers
{
    public class SGGW_FORUMController : Controller
    {
        public IActionResult korepetytorzy()
        {
            return View();
        }

        public IActionResult wykladowcy()
        {
            return View();
        }

        public IActionResult profil()
        {
            return View();
        }

        
    }
}
