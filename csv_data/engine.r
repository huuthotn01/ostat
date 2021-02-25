match <- c('week', 'month', 'quarter')
file_dir <- paste('D:\\Ostat\\csv_data\\', match[2], '.csv', sep="")
df <- read.table(file_dir, header = TRUE, sep = '|', encoding = 'UTF-8')
df[is.na(df)] <- 0
View(df)

df_mcode <- df[order(df$match_code),]
num_quest <- nrow(df_mcode)
field <- c('math', 'physics', 'chemistry', 'biology', 'literature', 'history', 'geography', 'english', 'other')
for (i in field) {
  df_sort <- df_mcode[df_mcode$i == 1]
  
}