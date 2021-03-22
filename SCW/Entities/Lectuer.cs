using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SCW.Entities
{
    public class Lectuer
    {
        public int Id { get; set; }

        public string Name { get; set; }
        public string Surname { get; set; }

        public string Degree { get; set; }
        public string Email { get; set; }

       // public float GradeLectuer { get; set; } mozna obliczyc z tabeli opiniaProwadzacych
        public virtual List<OpinionLectuer> Opinions { get; set; }
        //ocena srednia z opini 

        public virtual List<Subject> Subjects { get; set; }

        public virtual List<Faculty> Faculties { get; set; }
    }
}
