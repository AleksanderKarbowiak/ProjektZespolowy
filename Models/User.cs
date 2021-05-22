using Microsoft.AspNetCore.Identity;
using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class User : IdentityUser
    {
        public string Name { get; set; }
        public string Surname { get; set; }
        public int FieldId { get; set; }
        public bool IsTutor { get; set; }  //domyslnie false
        public virtual Tutor Tutor { get; set; }
    }
}
