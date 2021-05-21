using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace SCW.Entities
{
    public class Tutor
    {
        public int Id { get; set; }
        public string Name { get; set; }
        public string Surname { get; set; }

        public string PriceForHour { get; set; }

        public string Email { get; set; }

        public string PhoneNumber { get; set; }
        public int UserId { get; set; }
        public virtual User User { get; set; }
        //public float GradeTutor { get; set; } tez idze obliczyc 
        //ocena odzielnna tabela srednia
        public virtual List<OpinionTutor> Opinions { get; set; }
        public virtual List<Subject> Subjects { get; set; }
    }
}
