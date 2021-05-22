using System;
using System.Collections.Generic;
using System.Linq;
using System.Threading.Tasks;

namespace CentrumWiedzy.Models
{
    public class Tutor
    {
        public int Id { get; set; }

        public string PriceForHour { get; set; }

        public string PhoneNumber { get; set; }
        public string UserId { get; set; }
        public virtual User User { get; set; }
        //public float GradeTutor { get; set; } tez idze obliczyc 
        //ocena odzielnna tabela srednia
        public virtual ICollection<OpinionTutor> Opinions { get; set; }
        public virtual ICollection<SubjectTutor> SubjectTutors { get; set; }
    }
}
