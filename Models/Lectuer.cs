using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class Lectuer
    {
        public int Id { get; set; }

        public string Name { get; set; }
        public string Surname { get; set; }

        public string Degree { get; set; }
        public string Email { get; set; }

       // public float GradeLectuer { get; set; } mozna obliczyc z tabeli opiniaProwadzacych
        public virtual ICollection<OpinionLectuer> Opinions { get; set; }
        //ocena srednia z opini 

        public virtual ICollection<LectuerSubject> LectuerSubjects { get; set; }

        public virtual ICollection<FacultyLectuer> FacultyLectuers { get; set; }
    }
}
